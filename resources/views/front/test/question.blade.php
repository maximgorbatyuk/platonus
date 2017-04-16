
@extends('layouts._FrontLayout')

@php
    /** @var App\ViewModels\TestQuestionViewModel $model */;
    $variants = $model->current_question->getVariants();
@endphp

@section('title', 'Вопрос #')

@section('content')

    <div class="container my-2">
        <div class="card card-block">

            <div class="d-flex w-100 justify-content-between">
                <h2>Тестирование </h2>
                <div class="text-muted">{{ $model->current_pos+1 }} вопрос из {{ $model->question_count }}</div>
            </div>

            <div class="progress my-3">
                <div class="progress-bar"
                     role="progressbar"
                     style="width: {{ $model->progress_value }}%"
                     aria-valuenow="{{ $model->progress_value }}"
                     aria-valuemin="0"
                     aria-valuemax="100"></div>
            </div>

            {{ Form::open(['action' => 'TestController@question', 'id' => 'question_form']) }}

            {{ Form::hidden('document_id', $model->document->id) }}
            {{ Form::hidden('limit', $model->limit ? 1 : 0) }}
            {{ Form::hidden('current_pos', $model->current_pos) }}
            {{ Form::hidden('display_correct', $model->display_correct ? "true" : "false") }}
            {{ Form::hidden('show_swears', $model->show_swears ? "true" : "false") }}
            {{ Form::hidden('early_finish', false, ['id' => 'early_finish']) }}

            {{ Form::hidden('question_order', \GuzzleHttp\json_encode($model->question_order)) }}
            {{ Form::hidden('answered_questions', \GuzzleHttp\json_encode($model->answered_questions)) }}
            {{ Form::hidden('answers', \GuzzleHttp\json_encode($model->answers)) }}

            <div class="form-group">
                <p>
                    {{$model->current_question->getId()}}) {{ $model->current_question->getContent() }}
                </p>
            </div>

            @for($i = 0; $i < count($variants); $i++)

                <div class="form-group">
                    <label class="form-check-label variant w-100 py-2">
                        <input
                                class="form-check-input"
                                type="radio"
                                name="answer"
                                value="{{ $variants[$i] }}" {{ ($i == 0 ? "checked" : "") }}> {{ $variants[$i] }}
                    </label>
                </div>

            @endfor



            <div class="form-group d-flex w-100 justify-content-between">
                <button type="button" class="btn btn-outline-danger" id="confirmStart" data-toggle="modal" data-target="#confirm">Закончить</button>
                <div>
                    @php($active = $model->display_correct ? "" : "disabled")
                    <button type="button" class="btn btn-outline-success" id="displayCorrectBtn" {{ $active }}>Правильный</button>
                    <button type="submit" class="btn btn-indigo" id="sbtBtn">Далее <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                </div>
            </div>



        {{Form::close()}}

        <!-- Modal -->
            <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Завершение тестирования</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Ты уверен, что хочешь закончить тестирование раньше времени?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет, миссклик</button>
                            <button type="button" class="btn btn-danger" id="earlyFinish">Да, уверен</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{ asset('custom/js/TestHelper.js') }}"></script>
    <script>
        (function(){


            var answer = $('<textarea />').html("{{   $model->current_question->getAnswer(true) }}").text();
            var config = {
                correctAnswer : answer,
                variantClassName : "variant",
                submitBtnId : "sbtBtn",
                formId : "question_form",
                confirmStartId : "confirmStart",
                displayCorrectBtnId : "displayCorrectBtn",
                earlyFinInputId : "early_finish"
            };
            var helper = new TestHelper(config);

            $('#earlyFinish').on('click', function() {
                helper.EarlyFinish();
            });

            @if ($model->display_correct)
                $('#displayCorrectBtn').on('click', function() {
                    helper.DisplayCorrectAnswer();
                });
            @endif


        }());
    </script>
@endsection
