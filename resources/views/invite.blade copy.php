<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 900px;
            width: 100%;
            display: flex;
            gap: 2.5rem;
        }

        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h2 {
            margin-bottom: 1.5rem;
            color: #2196f3;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1976d2;
            font-weight: 500;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1px solid #b3e0fc;
            border-radius: 8px;
            font-size: 1rem;
            background: #f7fbff;
            transition: border 0.2s;
        }

        input:focus,
        textarea:focus {
            border: 1.5px solid #2196f3;
            outline: none;
        }

        button {
            background: linear-gradient(90deg, #2196f3 0%, #21cbf3 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
            box-shadow: 0 2px 8px 0 rgba(33, 150, 243, 0.10);
            transition: background 0.2s;
        }

        button:hover {
            background: linear-gradient(90deg, #21cbf3 0%, #2196f3 100%);
        }

        .preview-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-preview {
            width: 340px;
            height: 480px;
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card-text {
            width: 90%;
            text-align: center;
            color: #1976d2;
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
            word-break: break-word;
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1565c0;
            margin-bottom: 1.2rem;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                align-items: center;
                padding: 1.5rem 0.5rem;
            }

            .preview-section {
                margin-top: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-section">
            <h2>Invite Card Details</h2>
            <form id="inviteForm" autocomplete="off" onsubmit="event.preventDefault();">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter name" required />
                </div>
                <button type="submit">Preview</button>
            </form>
        </div>
        <div class="preview-section">
            <div class="card-preview" id="cardPreview"
                style="position: relative; background: none; box-shadow: none; width: 400px; height: 450px; padding: 0;">
                <img src="{{ asset('image/Salesberry-invitation-card-no-date.jpg') }}" alt="Invite Card"
                    style="width: 100%; height: 100%; border-radius: 18px; display: block;" />
                <div id="previewName"
                    style="position: absolute; top: 107px; left: 50%; transform: translateX(-50%); height: 41px; width: 70%; text-align: center; font-size: 1.5rem; font-weight: 700; color: #1b3c1b; letter-spacing: 1px; background: rgba(255,255,255,0.85); border-radius: 1px; padding: 0.5rem 0;">
                    Your Name</div>
            </div>
        </div>
    </div>
    <script>
        const nameInput = document.getElementById('name');
        const previewName = document.getElementById('previewName');

        function updatePreview() {
            const text = nameInput.value || 'Your Name';
            previewName.textContent = text;
            // Dynamic font size logic
            let fontSize = 1.5; // rem
            previewName.style.fontSize = fontSize + 'rem';
            previewName.style.whiteSpace = 'nowrap';
            previewName.style.overflow = 'hidden';
            previewName.style.textOverflow = 'ellipsis';
            // Reduce font size until it fits in one line or minimum font size reached
            const maxWidth = previewName.offsetWidth;
            while (previewName.scrollWidth > maxWidth && fontSize > 0.7) {
                fontSize -= 0.05;
                previewName.style.fontSize = fontSize + 'rem';
            }
        }
        nameInput.addEventListener('input', updatePreview);
        document.getElementById('inviteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            updatePreview();
        });
    </script>
</body>

</html>