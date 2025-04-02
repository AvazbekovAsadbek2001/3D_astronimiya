<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testni topshirish</title>
    <style>
        testy-body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4A90E2;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .question {
            margin-bottom: 20px;
            padding: 50px;
            background-color: #f9f9f9;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .question h3 {
            margin-top: 0;
            color: #333;
            font-size: 18px;
        }

        .question label {
            display: block;
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        .question input[type="radio"] {
            margin-right: 10px;
        }

        button[type="submit"] {
            background-color: #4A90E2;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #357ABD;
        }

        #timer {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 20px;
            font-weight: bold;
            color: red;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 5px 10px;
            border-radius: 4px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <testy-body>
        <h1>Testni topshirish</h1>
        <div id="timer"></div>
            <form method="POST" action="{{ route('submit') }}" id="testForm">
               <input type="hidden" name="test_id" value="{{ $test->id }}">
                @csrf
                @foreach ($tests as $question)
                    <div class="question">
                        <h3>{{ $question->question }}</h3>
                        @foreach ($question->answers as $answer)
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                                {{ $answer->answer }}
                            </label>
                        @endforeach

                        <input type="hidden" name="answers[{{ $question->id }}]" value="0">
                    </div>
                @endforeach
                <center><button type="submit">Testni yakunlash</button></center>
            </form>
            <script>
                let timeLimit = {{ $test->time }} * 60;
                let timerElement = document.getElementById('timer');
                let testForm = document.getElementById('testForm');
                let isSubmitted = false;

                function updateTimer() {
                    let minutes = Math.floor(timeLimit / 60);
                    let seconds = timeLimit % 60;
                    timerElement.innerText = `Qolgan vaqt: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                    if (timeLimit <= 0 && !isSubmitted) {
                        submitFormWithValues();
                    } else if (timeLimit > 0) {
                        timeLimit--;
                        setTimeout(updateTimer, 1000);
                    }
                }

                updateTimer();

                function submitFormWithValues() {
                    if (isSubmitted) return;
                    isSubmitted = true;

                    document.querySelectorAll('.question').forEach(question => {
                        let questionInputs = question.querySelectorAll('input[type="radio"]');
                        let hiddenInput = question.querySelector('input[type="hidden"]');
                        let selectedAnswer = question.querySelector('input[type="radio"]:checked');

                        if (selectedAnswer) {
                            hiddenInput.value = selectedAnswer.value;
                        } else {
                            hiddenInput.value = "0";
                        }
                    });

                    testForm.submit();
                }

                window.addEventListener('beforeunload', function (e) {
                    if (timeLimit > 0 && !isSubmitted) {
                        submitFormWithValues();
                        let confirmationMessage = 'Sahifadan chiqsangiz, javoblaringiz jo‘natiladi. Davom etasizmi?';
                        (e || window.event).returnValue = confirmationMessage;
                        return confirmationMessage;
                    }
                });
            </script>
        </testy-body>
</body>
</html>