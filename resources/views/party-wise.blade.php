<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panchagarh Election Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* CSS styles */

        #svg-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        #button-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .button-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-right: 20px;
        }

        .button {
            margin-bottom: 5px;
        }

        #panchagarh-1-map {
            fill: #ccc;
            stroke: #333;
            stroke-width: 1;
            width: 50%;
            margin-bottom: 10px;
        }

        .hover-info {
            position: absolute;
            top: -9999px;
            left: -9999px;
            display: none;
            pointer-events: none;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            font-size: 14px;
            white-space: nowrap;
        }

        .path-hover {
            transition: 0.3s;
        }

    </style>
</head>
<body>
<div id="svg-container">
    <span style="text-align: center">Panchagarh-1 Election Data</span>

    <div id="button-container">
        <div class="button-group" data-group="year">
            <label for="year">Party:</label>
            <input type="radio" name="party" id="bnp" value="bnp" checked>
            <label for="bnp">BNP</label>
            <input type="radio" name="party" id="awamileague" value="awamileague">
            <label for="awamileague">Awami League</label>
        </div>
    </div>


    <svg
        xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:cc="http://creativecommons.org/ns#"
        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns:svg="http://www.w3.org/2000/svg"
        xmlns="http://www.w3.org/2000/svg"
        id="panchagarh-1-map"
        version="1.1"
        viewBox="0 0 210 297"
        height="250mm"
        width="210mm"
    >
        <!-- Insert your SVG code here -->
        <defs
            id="defs558"/>
        <metadata
            id="metadata561">
            <rdf:RDF>
                <cc:Work
                    rdf:about="">
                    <dc:format>image/svg+xml</dc:format>
                    <dc:type
                        rdf:resource="http://purl.org/dc/dcmitype/StillImage"/>
                    <dc:title></dc:title>
                </cc:Work>
            </rdf:RDF>
        </metadata>
        <g
            id="layer1">

            @foreach ($pathsValue as $key=>$value)
                @php
                    $desiredYear = '2008';
$desiredUnion = $key;

$filteredDataOf2008 = $datas->filter(function ($object) use ($desiredYear, $desiredUnion) {
    return $object->সাল === '2008' && $object->ইউনিয়ন === $desiredUnion;
});
                        $dataOf2008 = $filteredDataOf2008->first();
                        $filteredDataOf2018 = $datas->filter(function ($object) use ($desiredYear, $desiredUnion) {
    return $object->সাল === '2018' && $object->ইউনিয়ন === $desiredUnion;
});
                        $dataOf2018 = $filteredDataOf2018->first();

                            $percentageOf2008 = ($dataOf2008->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির * 100)/$dataOf2008->মোট_বৈধ;
                            $percentageOf2018 = ($dataOf2018->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির * 100)/$dataOf2018->মোট_বৈধ;

                    @endphp
                <defs>

                        <linearGradient id="grad{{$key}}" x1="0%" y1="100%" x2="0%" y2="0%">
                            <stop offset="0%" style="stop-color: red; stop-opacity: 1"/>
                            <stop offset="{{ $percentageOf2008 }}%" style="stop-color: red; stop-opacity: 1"/>
                            <stop offset="{{ $percentageOf2008 }}%" style="stop-color: green; stop-opacity: 1"/>
                            <stop offset="{{ $percentageOf2008 + $percentageOf2018 }}%"
                                  style="stop-color: green; stop-opacity: 1"/>
                            <stop offset="{{ $percentageOf2008 + $percentageOf2018 }}%"
                                  style="stop-color: #fff; stop-opacity: 1"/>
                            <stop offset="100%" style="stop-color: #fff; stop-opacity: 1"/>
                        </linearGradient>
                    </defs>
                <path
                        class="path-hover"
                        d="{{ $value }}"
                        data-union="{{ $key }}"
                        data-a="{{ $percentageOf2008 }}"
                        data-b="{{ $percentageOf2018 }}"
                        style="opacity:0.5;fill: url(#grad{{$key}}); ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"
                        {{--                    style="opacity:0.5;fill: {{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান ? 'red' : 'green' }} ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"--}}
                    />
            @endforeach
        </g>
    </svg>

    <div class="hover-info">
        <h3 style="text-align: center" id="আসন"></h3>
        <span>2008: <p id="jomir" style="display: inline"> </p> </span>
        <br>
        <span>2018: <p id="majharul" style="display: inline"></p></span>
    </div>
</div>

<script>
    $(document).ready(function () {

        // Filter button click event
        $('.button-group[data-group="year"] input[type="radio"]').on('change', function () {
            var selectedYear = $(this).val();

            // Filter the data based on the selected year
            var datas = {!! $datas !!};
            var pathvalues = @json($pathsValue);
            var filteredData = datas.filter(function (data) {
                return data['সাল'] === selectedYear;
            });

            // Generate the updated SVG code
            var svgCode = '<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" id="panchagarh-1-map" version="1.1" viewBox="0 0 210 297" height="250mm" width="210mm">';

            svgCode += '<defs id="defs558"></defs>';
            svgCode += '<metadata id="metadata561">';
            svgCode += '<rdf:RDF>';
            svgCode += '<cc:Work rdf:about="">';
            svgCode += '<dc:format>image/svg+xml</dc:format>';
            svgCode += '<dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />';
            svgCode += '<dc:title></dc:title>';
            svgCode += '</cc:Work>';
            svgCode += '</rdf:RDF>';
            svgCode += '</metadata>';
            svgCode += '<g id="layer1">';

            filteredData.forEach(function (data, index) {
                let union = data['ইউনিয়ন'];
                // var color = data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] > data['মোঃ_মজাহারুল_হক_প্রধান'] ? 'red' : 'green';
                var bnpPercentage = (data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] * 100) / data['মোট_বৈধ'];
                var awamiPercentage = (data['মোঃ_মজাহারুল_হক_প্রধান'] * 100) / data['মোট_বৈধ'];
                console.log("Union: " + union + " Jamir: " + data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] + " Majharul: " + data['মোঃ_মজাহারুল_হক_প্রধান'] + " Bnp: " + bnpPercentage + " Awami: " + awamiPercentage)


                svgCode += '<defs>';
                svgCode += '<linearGradient id="grad' + index + '" x1="0%" y1="100%" x2="0%" y2="0%">';
                svgCode += '<stop offset="0%" style="stop-color: red; stop-opacity: 1" />';
                svgCode += '<stop offset="' + bnpPercentage + '%" style="stop-color: red; stop-opacity: 1" />';
                svgCode += '<stop offset="' + bnpPercentage + '%" style="stop-color: green; stop-opacity: 1" />';
                svgCode += '<stop offset="' + (bnpPercentage + awamiPercentage) + '%" style="stop-color: green; stop-opacity: 1" />';
                svgCode += '<stop offset="' + (bnpPercentage + awamiPercentage) + '%" style="stop-color: white; stop-opacity: 1" />';
                svgCode += '<stop offset="100%" style="stop-color: white; stop-opacity: 1" />';
                svgCode += '</linearGradient>';
                // svgCode += '<linearGradient id="grad' + index + '" x1="0%" y1="100%" x2="0%" y2="0%">';
                // svgCode += '<stop offset="0%" style="stop-color: red; stop-opacity: 1" />';
                // svgCode += '<stop offset="' + bnpPercentage + '%" style="stop-color: red; stop-opacity: 1" />';
                // svgCode += '<stop offset="' + awamiPercentage + '%" style="stop-color: green; stop-opacity: 1" />';
                // // svgCode += '<stop offset="' + (bnpPercentage + awamiPercentage + remainingPercentage) + '%" style="stop-color: #fff; stop-opacity: 1" />';
                // svgCode += '<stop offset="100%" style="stop-color: #fff; stop-opacity: 1" />';
                // svgCode += '</linearGradient>';
                svgCode += '</defs>';
                svgCode += '<path class="path-hover" d="' + pathvalues[union] + '" data-union="' + data['ইউনিয়ন'] + '" data-a="' + data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] + '" data-b="' + data['মোঃ_মজাহারুল_হক_প্রধান'] + '" style="opacity:0.5;fill: url(#grad' + index + '); fill-opacity:0.6; stroke:#2c2c2f; stroke-width:0.22900671; stroke-linecap:round; stroke-linejoin:bevel; stroke-miterlimit:4; stroke-dasharray:none; stroke-dashoffset:0; stroke-opacity:0.9372549" />';
            });

            svgCode += '</g>';
            svgCode += '</svg>';

            // Replace the entire SVG with the updated SVG code
            $('#panchagarh-1-map').replaceWith(svgCode);
        });


        // Button group click event
        $('.button-group .button').click(function () {
            $(this).addClass('active').siblings().removeClass('active');

            // Get selected values
            var selectedParty = $('.button-group[data-group="party"] .button.active').data('party');
            var selectedYear = $('.button-group[data-group="year"] .button.active').data('year');

            // Perform actions based on selected values
            // ...
        });

        $('#svg-container').on('mouseenter', '.path-hover', function () {
            let jomir = $(this).data('a');
            let majharul = $(this).data('b')
            let hoverInfo = $('.hover-info');
            let union = $(this).data('union')
            $('#jomir').html(jomir)
            $('#majharul').html(majharul)
            $('#আসন').html(union)

            $(this).css({
                cursor: 'pointer',
                opacity: 1,
                // Add more properties as needed
            });

            // Update the content and position of hover-info div
            // hoverInfo.text(infoText);
            hoverInfo.show();

            // Calculate the position relative to the cursor
            var offsetX = 20; // Adjust the horizontal offset
            var offsetY = 20; // Adjust the vertical offset

            // Position the hover-info div
            var posX = event.pageX + offsetX;
            var posY = event.pageY + offsetY;

            hoverInfo.css({
                top: posY + 'px',
                left: posX + 'px',
            });
        });

        $('#svg-container').on('mouseleave', '.path-hover', function () {
            $(this).css({

                opacity: 0.6,
                // Add more properties as needed
            });
            $('.hover-info').hide();
        });
    });
</script>

</body>
</html>
