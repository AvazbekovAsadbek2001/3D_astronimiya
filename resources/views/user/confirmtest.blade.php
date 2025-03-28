<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test natijasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .result-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 70%;
            width: 100%;
            margin: 20px;
        }

        .result-container h1 {
            font-size: 1.5rem;
            color: #333333;
            margin-bottom: 1rem;
        }

        .result-container p {
            font-size: 1rem;
            color: #555555;
            margin: 0.5rem 0;
        }

        .result-container a {
            text-decoration: none;
        }

        .result-container button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }

        .result-container button:hover {
            background-color: #0056b3;
        }

        .question-list {
            text-align: left;
            margin-top: 2rem;
        }

        .question-item {
            margin-bottom: 1.5rem;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .question-item p {
            margin: 0.3rem 0;
        }

        .options {
            margin-left: 20px;
        }

        .correct {
            color: #28a745;
            font-weight: bold;
        }

        .incorrect {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    {{-- test_useranswer --}}
    <div class="result-container">
        <h1>Test natijalari</h1>
        <p><strong>Test nomi:</strong> {{ $testanswer->test->title }} </p>

        <div class="question-list">
            @foreach ($test_useranswer as $item)
            <div class="question-item">
                <p><strong>Savol {{ $loop->iteration }}: {{ $item->question->question }}</strong> </p>
                <div class="options">
                    @foreach ($item->question->answers as $answer)
                        <p>- {{ $answer->answer }}
                            @if ($answer->id == $item->answer_id)
                                @if ($answer->is_correct == 1)
                                    <span class="correct">(Siz tanladingiz - To‘g‘ri)</span>
                                @else
                                    <span class="incorrect">(Siz tanladingiz - Noto‘g‘ri)</span>
                                @endif
                            @endif
                        </p>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <p><strong>Jami savollar:</strong>{{ $testanswer->test->count_question }}</p>
        <p><strong>To‘g‘ri javoblar:</strong> {{ $testanswer->count_answer }}</p>
        <a href="{{ route('tests', ['id' => session('route_id')]) }}">
            <button type="button">Qaytish</button>
        </a>
    </div>
</body>
</html>