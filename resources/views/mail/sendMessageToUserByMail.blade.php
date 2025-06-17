<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            padding-bottom: 20px;
        }

        .email-header h1 {
            margin: 0;
            color: #333333;
        }

        .email-body {
            font-size: 16px;
            color: #555555;
            line-height: 1.6;
            padding-bottom: 20px;
        }

        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
        }

        .email-footer a {
            color: #555555;
            text-decoration: none;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="email-header">
            <h1>សូមស្វាគមន៍!!!</h1>
            <div>អង្គភាពសវនកម្មផ្ទៃក្នុងនៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ <a
                    href="https://brms.iauoffsa.us">ប្រព័ន្ធកក់បន្ទប់ប្រជុំឌីជីថល</a></div>
        </div>

        <div class="email-body">
            <p>សួស្ដី {{ $name }}</p>
            <ul>
                <li>{{ $content['status'] }}</li>
                <li>{{ $content['topic'] }}</li>
                <li>{{ $content['date'] }}</li>
                <li>{{ $content['room'] }}</li>
                <li>{{ $content['times'] }}</li>
                @if ($content['reason'])
                    <li>{{ $content['reason'] }}</li>
                @endif
            </ul>
        </div>

        <div class="email-footer">
            <div>ព័ត៌មានលម្អិត៖ <a href="https://t.me/kakadaa_07"
                    style="text-decoration-line: line">ទំនាក់ទំនងមន្ត្រីទទួលបន្ទុក</a></div>
            <div>សូមអរគុណ។</div>

        </div>
    </div>

</body>

</html>
