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
            <label for="year">Year:</label>
            <input type="radio" name="year" id="year2008" value="2008" checked>
            <label for="year2008">2008</label>
            <input type="radio" name="year" id="year2018" value="2018">
            <label for="year2018">2018</label>
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
            id="defs558" />
        <metadata
            id="metadata561">
            <rdf:RDF>
                <cc:Work
                    rdf:about="">
                    <dc:format>image/svg+xml</dc:format>
                    <dc:type
                        rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                    <dc:title></dc:title>
                </cc:Work>
            </rdf:RDF>
        </metadata>
        <g
            id="layer1">

            @foreach ($datas as $key=>$data)
                @if($data->সাল == '2008')
                    @php
                        $color = $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান ? 'red' : 'green';
                        if($data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান){
                            $percentage = ($data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির * 100)/$data->মোট_বৈধ;
                        }else{
                            $percentage = ($data->মোঃ_মজাহারুল_হক_প্রধান * 100)/$data->মোট_বৈধ;
                        }

                    @endphp
{{--                    <defs>--}}
{{--                        <linearGradient id="grad{{$key}}" x1="0%" y1="0%" x2="100%" y2="0%">--}}
{{--                            <stop offset="0%" style="stop-color: {{ $color }}; stop-opacity: 1" />--}}
{{--                            <stop offset="{{ $percentage }}%" style="stop-color: {{$color}}; stop-opacity: 1" />--}}
{{--                            <stop offset="{{$percentage+0.1}}%" style="stop-color: #ccc; stop-opacity: 1" />--}}
{{--                            <stop offset="100%" style="stop-color: #ccc; stop-opacity: 1" />--}}
{{--                        </linearGradient>--}}
{{--                    </defs>--}}
                    <defs>
                        <linearGradient id="grad{{$key}}" x1="0%" y1="100%" x2="0%" y2="0%">
                            <stop offset="0%" style="stop-color: {{$color}}; stop-opacity: 1" />
                            <stop offset="{{$percentage}}%" style="stop-color: {{$color}}; stop-opacity: 1" />
                            <stop offset="{{$percentage}}%" style="stop-color: #fff; stop-opacity: 1" />
                            <stop offset="100%" style="stop-color: #fff; stop-opacity: 1" />
                        </linearGradient>
                    </defs>
                    <path
                        class="path-hover"
                        d="{{ $pathsValue[$data->ইউনিয়ন] }}"
                        data-union = {{ $data->ইউনিয়ন }}
                            data-a="{{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির }}"
                        data-b="{{ $data->মোঃ_মজাহারুল_হক_প্রধান }}"
                        style="opacity:0.5;fill: url(#grad{{$key}}); ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"
                        {{--                    style="opacity:0.5;fill: {{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান ? 'red' : 'green' }} ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"--}}
                    />
                @endif
            @endforeach


{{--            @foreach ($datas as $data)--}}
{{--                <path--}}
{{--                    class="path-hover"--}}
{{--                    d="{{ $pathsValue[$data->ইউনিয়ন] }}"--}}
{{--                    data-union = {{ $data->ইউনিয়ন }}--}}
{{--                    data-a="{{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির }}"--}}
{{--                    data-b="{{ $data->মোঃ_মজাহারুল_হক_প্রধান }}"--}}
{{--                    style="opacity:0.5;fill: {{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান ? 'red' : 'green' }} ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"--}}
{{--                />--}}
{{--            @endforeach--}}
        </g>
    </svg>

    <div class="hover-info">
        <h3 style="text-align: center" id="আসন"></h3>
        <span>ব্যারিস্টার মুহম্মদ নওশাদ জমির: <p id="jomir" style="display: inline"> </p> </span>
        <br>
        <span>মোঃ মজাহারুল হক প্রধান <p id="majharul" style="display: inline"></p></span>
    </div>
</div>

<script>
    $(document).ready(function () {

        // Filter button click event
        $('.button-group[data-group="year"] input[type="radio"]').on('change', function() {
            var selectedYear = $(this).val();

            // Filter the data based on the selected year
            var datas = {!! $datas !!};
            var pathvalues = @json($pathsValue);
            console.log(pathvalues)
            {{--let pathsvalues = @josn({!! $pathsValue !!});--}}
            var filteredData = datas.filter(function(data) {
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

            filteredData.forEach(function(data, index) {
                let union = data['ইউনিয়ন'];
                console.log(union);
                var color = data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] > data['মোঃ_মজাহারুল_হক_প্রধান'] ? 'red' : 'green';
                var percentage = data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] > data['মোঃ_মজাহারুল_হক_প্রধান'] ? (data['ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির'] * 100) / data['মোট_বৈধ'] : (data['মোঃ_মজাহারুল_হক_প্রধান'] * 100) / data['মোট_বৈধ'];

                svgCode += '<defs>';
                svgCode += '<linearGradient id="grad' + index + '" x1="0%" y1="100%" x2="0%" y2="0%">';
                svgCode += '<stop offset="0%" style="stop-color: ' + color + '; stop-opacity: 1" />';
                svgCode += '<stop offset="' + percentage + '%" style="stop-color: ' + color + '; stop-opacity: 1" />';
                svgCode += '<stop offset="' + (percentage + 0.1) + '%" style="stop-color: #ccc; stop-opacity: 1" />';
                svgCode += '<stop offset="100%" style="stop-color: #ccc; stop-opacity: 1" />';
                svgCode += '</linearGradient>';
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

        $('#svg-container').on('mouseenter', '.path-hover', function(){
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

        $('#svg-container').on('mouseleave', '.path-hover', function(){
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




{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta http-equiv="x-ua-compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Panchagarh Election Data</title>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--    <style>--}}
{{--        /*style="opacity:0.5;fill:red;fill-opacity:0.9372549;stroke:#2c2c2f;stroke-width:0.45801342;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"*/--}}
{{--        #panchagarh-1-map{--}}
{{--            fill: #ccc;--}}
{{--            stroke: #333;--}}
{{--            stroke-width: 1;--}}
{{--            width: 50%;--}}
{{--        }--}}
{{--        .hover-info {--}}
{{--            position: absolute;--}}
{{--            top: -9999px;--}}
{{--            left: -9999px;--}}
{{--            display: none;--}}
{{--            pointer-events: none;--}}
{{--            padding: 10px;--}}
{{--            background-color: rgba(0, 0, 0, 0.8);--}}
{{--            color: #fff;--}}
{{--            font-size: 14px;--}}
{{--            white-space: nowrap;--}}
{{--            /*width: 300px;*/--}}
{{--        }--}}
{{--        /*.hover-info {*/--}}
{{--        /*    position: absolute;*/--}}
{{--        /*    display: none;*/--}}
{{--        /*    pointer-events: none;*/--}}
{{--        /*}*/--}}
{{--        .path-hover{--}}
{{--            transition: 0.3s;--}}
{{--        }--}}


{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<span>Panchagarh-1 Election Data</span>--}}


{{--<svg--}}
{{--    xmlns:dc="http://purl.org/dc/elements/1.1/"--}}
{{--    xmlns:cc="http://creativecommons.org/ns#"--}}
{{--    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"--}}
{{--    xmlns:svg="http://www.w3.org/2000/svg"--}}
{{--    xmlns="http://www.w3.org/2000/svg"--}}
{{--    id="panchagarh-1-map"--}}
{{--    version="1.1"--}}
{{--    viewBox="0 0 210 297"--}}
{{--    height="297mm"--}}
{{--    width="210mm"--}}
{{-->--}}
{{--    <defs--}}
{{--        id="defs558" />--}}
{{--    <metadata--}}
{{--        id="metadata561">--}}
{{--        <rdf:RDF>--}}
{{--            <cc:Work--}}
{{--                rdf:about="">--}}
{{--                <dc:format>image/svg+xml</dc:format>--}}
{{--                <dc:type--}}
{{--                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />--}}
{{--                <dc:title></dc:title>--}}
{{--            </cc:Work>--}}
{{--        </rdf:RDF>--}}
{{--    </metadata>--}}
{{--    <g--}}
{{--        id="layer1">--}}


{{--        @foreach ($datas as $data)--}}
{{--            <path--}}
{{--                class="path-hover"--}}
{{--                d="{{ $pathsValue[$data->ইউনিয়ন] }}"--}}
{{--                data-union = {{ $data->ইউনিয়ন }}--}}
{{--                    data-a="{{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির }}"--}}
{{--                data-b="{{ $data->মোঃ_মজাহারুল_হক_প্রধান }}"--}}
{{--                style="opacity:0.5;fill: {{ $data->ব্যারিস্টার_মুহম্মদ_নওশাদ_জমির > $data->মোঃ_মজাহারুল_হক_প্রধান ? 'red' : 'green' }} ;fill-opacity:0.6;stroke:#2c2c2f;stroke-width:0.22900671;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:0.9372549"--}}
{{--            />--}}
{{--        @endforeach--}}
{{--    </g>--}}
{{--</svg>--}}
{{--<div class="hover-info">--}}
{{--    <h3 style="text-align: center" id="আসন"></h3>--}}
{{--    <span>ব্যারিস্টার মুহম্মদ নওশাদ জমির: <p id="jomir" style="display: inline"> </p> </span>--}}
{{--    <br>--}}
{{--    <span>মোঃ মজাহারুল হক প্রধান <p id="majharul" style="display: inline"></p></span>--}}
{{--</div>--}}

{{--<script>--}}
{{--    $(document).ready(function() {--}}

{{--        $('.path-hover').mouseenter(function () {--}}
{{--            let jomir = $(this).data('a');--}}
{{--            let majharul = $(this).data('b')--}}
{{--            let hoverInfo = $('.hover-info');--}}
{{--            let union = $(this).data('union')--}}
{{--            $('#jomir').html(jomir)--}}
{{--            $('#majharul').html(majharul)--}}
{{--            $('#আসন').html(union)--}}

{{--            $(this).css({--}}
{{--                cursor: 'pointer',--}}
{{--                opacity: 1,--}}
{{--                // Add more properties as needed--}}
{{--            });--}}

{{--            // Update the content and position of hover-info div--}}
{{--            // hoverInfo.text(infoText);--}}
{{--            hoverInfo.show();--}}

{{--            // Calculate the position relative to the cursor--}}
{{--            var offsetX = 20; // Adjust the horizontal offset--}}
{{--            var offsetY = 20; // Adjust the vertical offset--}}

{{--            // Position the hover-info div--}}
{{--            var posX = event.pageX + offsetX;--}}
{{--            var posY = event.pageY + offsetY;--}}

{{--            hoverInfo.css({--}}
{{--                top: posY + 'px',--}}
{{--                left: posX + 'px',--}}
{{--            });--}}
{{--        });--}}

{{--        $('.path-hover').mouseleave(function () {--}}
{{--            $(this).css({--}}

{{--                opacity: 0.6,--}}
{{--                // Add more properties as needed--}}
{{--            });--}}
{{--            $('.hover-info').hide();--}}
{{--        });--}}


{{--    });--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
