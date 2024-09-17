    SELECT CONCAT('Hello', ' ', 'World') AS ConcatenatedString;

SELECT LENGTH('Smriti') AS StringLength;

SELECT LOWER('HELLO WORLD') AS LowercaseString;

SELECT UPPER('hello world') AS UppercaseString;

SELECT SUBSTRING('Database', 2, 4) AS SubstringValue;

SELECT TRIM('   Extra spaces   ') AS TrimmedString;

SELECT LTRIM('   Extra spaces') AS LTrimmedString;

SELECT RTRIM('Extra spaces   ') AS RTrimmedString;

SELECT REPLACE('Hello World', 'World', 'MySQL') AS ReplacedString;

SELECT LEFT('LeftFunction', 4) AS LeftString;

SELECT RIGHT('RightFunction', 6) AS RightString;

SELECT INSTR('Find the position', 'position') AS PositionIndex;

SELECT LPAD('123', 5, '0') AS LeftPaddedString;

SELECT RPAD('123', 5, '0') AS RightPaddedString;

SELECT CHAR_LENGTH('Length') AS CharLength;

SELECT CHAR('72', '101', '108', '108', '111') AS CharFromCodes;
