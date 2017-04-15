<?php
/**
 * Created by PhpStorm.
 * User: Next
 * Date: 04.04.2017
 * Time: 18:41
 */

namespace App\Traits;

use DOMDocument;
use Log;
use PhpParser\Error;
use Whoops\Exception\ErrorException;
use ZipArchive;

/**
 * Class WordDocTrait
 * Сборник функций, которые используются для преобразования ворд-файла в объект
 * @package App\Traits
 */
trait WordDocTrait
{

    protected function getFullFilename($filename) {
        $dir = storage_path('app'.DIRECTORY_SEPARATOR.'uploads');
        $dir = $dir.DIRECTORY_SEPARATOR.$filename;
        return $dir;
    }

    /**
     * Возвращает контент документа
     * @param $filename
     * @return string
     * @throws ErrorException
     */
    protected function read_docx($filename){

        $striped_content = '';
        $content = '';

        $zip = zip_open($filename);

        if (!$zip || is_numeric($zip)) {

            throw new ErrorException('Блядский зип не работает '.var_export($zip, true));
        }

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }


    protected function read_doc_file($filename)
    {
        $result = null;
        if ( ($fh = fopen($filename, 'r')) !== false ) {

            $headers = fread($fh, 0xA00);

            # 1 = (ord(n)*1) ; Document has from 0 to 255 characters
            $n1 = ( ord($headers[0x21C]) - 1 );

            # 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
            $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

            # 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
            $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

            # (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
            $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

            # Total length of text in the document
            $textLength = ($n1 + $n2 + $n3 + $n4);

            $extracted_plaintext = fread($fh, $textLength);

            # if you want the plain text with no formatting, do this
            //return $extracted_plaintext;

            # if you want to see your paragraphs in a web page, do this
            return nl2br($extracted_plaintext);
        }
        throw new ErrorException('Файл не доступен '.$filename);
    }



    protected function convertToText($filename) {
        if(!file_exists($filename)) {
            throw new Error('Указанный файл '.$filename.' не существует');
        }

        $fileArray = pathinfo($filename);
        $file_ext  = $fileArray['extension'];

        if($file_ext == "docx")
        {
            return $this->readZippedXML($filename);
        }
        elseif($file_ext == "doc")
        {
            return $this->read_doc_file($filename);
        }
        throw new Error('Неразрешенное расширение файла');
    }

    protected function zipFileErrMsg($errno) {
        // using constant name as a string to make this function PHP4 compatible
        $zipFileFunctionsErrors = array(
            'ZIPARCHIVE::ER_MULTIDISK' => 'Multi-disk zip archives not supported.',
            'ZIPARCHIVE::ER_RENAME' => 'Renaming temporary file failed.',
            'ZIPARCHIVE::ER_CLOSE' => 'Closing zip archive failed',
            'ZIPARCHIVE::ER_SEEK' => 'Seek error',
            'ZIPARCHIVE::ER_READ' => 'Read error',
            'ZIPARCHIVE::ER_WRITE' => 'Write error',
            'ZIPARCHIVE::ER_CRC' => 'CRC error',
            'ZIPARCHIVE::ER_ZIPCLOSED' => 'Containing zip archive was closed',
            'ZIPARCHIVE::ER_NOENT' => 'No such file.',
            'ZIPARCHIVE::ER_EXISTS' => 'File already exists',
            'ZIPARCHIVE::ER_OPEN' => 'Can\'t open file',
            'ZIPARCHIVE::ER_TMPOPEN' => 'Failure to create temporary file.',
            'ZIPARCHIVE::ER_ZLIB' => 'Zlib error',
            'ZIPARCHIVE::ER_MEMORY' => 'Memory allocation failure',
            'ZIPARCHIVE::ER_CHANGED' => 'Entry has been changed',
            'ZIPARCHIVE::ER_COMPNOTSUPP' => 'Compression method not supported.',
            'ZIPARCHIVE::ER_EOF' => 'Premature EOF',
            'ZIPARCHIVE::ER_INVAL' => 'Invalid argument',
            'ZIPARCHIVE::ER_NOZIP' => 'Not a zip archive',
            'ZIPARCHIVE::ER_INTERNAL' => 'Internal error',
            'ZIPARCHIVE::ER_INCONS' => 'Zip archive inconsistent',
            'ZIPARCHIVE::ER_REMOVE' => 'Can\'t remove file',
            'ZIPARCHIVE::ER_DELETED' => 'Entry has been deleted',
        );
        $errmsg = 'unknown';
        foreach ($zipFileFunctionsErrors as $constName => $errorMessage) {
            if (defined($constName) and constant($constName) === $errno) {
                return 'Zip File Function error: '.$errorMessage;
            }
        }
        return 'Zip File Function error: unknown';
    }


    protected function readZippedXML($archiveFile, $dataFile = "word/document.xml") {
        // Create new ZIP archive
        $zip = new ZipArchive;

        // Open received archive file
        if (true === $zip->open($archiveFile)) {
            // If done, search for the data file in the archive
            if (($index = $zip->locateName($dataFile)) !== false) {
                // If found, read it to the string
                $data = $zip->getFromIndex($index);
                // Close archive file
                $zip->close();
                // Load XML from a string
                // Skip errors and warnings
                $xml = new DOMDocument();
                $xml->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                // Return data without XML formatting tags
                return strip_tags($xml->saveXML());
            }
            $zip->close();
        }

        // In case of failure return empty string
        return "";
    }

    /**
     * Читает контент документа по переданному названию файла. Файл ищется в директории загрузок
     * @param $filename
     * @return string
     */
    protected function readContent($filename)
    {
        $filename = $this->getFullFilename($filename);
        return $this->convertToText($filename);
    }


}