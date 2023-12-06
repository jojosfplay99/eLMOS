function convertNumberToWords(number) {
    var ones = ["", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
    var teens = ["", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
    var tens = ["", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

    function convertChunk(chunk) {
        var num = parseInt(chunk);
        if (num === 0) {
            return "";
        } else if (num < 10) {
            return ones[num];
        } else if (num < 20) {
            return teens[num - 10];
        } else {
            var tenDigit = Math.floor(num / 10);
            var oneDigit = num % 10;
            return tens[tenDigit] + (oneDigit !== 0 ? "-" + ones[oneDigit] : "");
        }
    }

    if (isNaN(number)) {
        return "Invalid input";
    }

    number = number.toString();
    var chunks = number.match(/\d{1,3}(?=(\d{3})+(?!\d))/g);
    var chunkWords = [];

    for (var i = 0; i < chunks.length; i++) {
        var chunkWord = convertChunk(chunks[i]);
        if (chunkWord !== "") {
            if (i === chunks.length - 1) {
                chunkWords.push(chunkWord);
            } else {
                chunkWords.push(chunkWord + " " + ["", "thousand", "million", "billion", "trillion"][i]);
            }
        }
    }

    return chunkWords.reverse().join(" ");
}