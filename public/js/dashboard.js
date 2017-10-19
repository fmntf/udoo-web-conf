﻿function arduinoMap(x, in_min, in_max, out_min, out_max) {
    return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}

$(function() {
    var ws = new ReconnectingWebSocket('ws://' + location.hostname + ":8888");
    ws.onmessage = function (event) {
        var data = JSON.parse(event.data);
        var tmp;
        tmp = arduinoMap(Math.abs(data.accelerometer.axis[0]), 0, 16000, 0, 100);
        $(".progress.accelerometer-x div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.accelerometer.axis[1]), 0, 16000, 0, 100);
        $(".progress.accelerometer-y div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.accelerometer.axis[2]), 0, 16000, 0, 100);
        $(".progress.accelerometer-z div").width(tmp+"%");

        tmp = arduinoMap(Math.abs(data.gyroscope.axis[0]), 0, 16000, 0, 100);
        $(".progress.gyroscope-x div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.gyroscope.axis[1]), 0, 16000, 0, 100);
        $(".progress.gyroscope-y div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.gyroscope.axis[2]), 0, 16000, 0, 100);
        $(".progress.gyroscope-z div").width(tmp+"%");

        tmp = arduinoMap(Math.abs(data.magnetometer.axis[0]), 0, 16000, 0, 100);
        $(".progress.magnetometer-x div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.magnetometer.axis[1]), 0, 16000, 0, 100);
        $(".progress.magnetometer-y div").width(tmp+"%");
        tmp = arduinoMap(Math.abs(data.magnetometer.axis[2]), 0, 16000, 0, 100);
        $(".progress.magnetometer-z div").width(tmp+"%");

        var acc = arduinoMap(data.accelerometer.modulus, 0, 50000, 0, 100);
        $(".progress.accelerometer-modulus div").width(acc+"%");

        var gyro = arduinoMap(data.gyroscope.modulus, 0, 10000, 0, 100);
        $(".progress.gyroscope-modulus div").width(gyro+"%");

        var magn = arduinoMap(data.magnetometer.modulus, 0, 10000, 0, 100);
        $(".progress.magnetometer-modulus div").width(magn+"%");
    };
});
