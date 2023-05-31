create table debec (
    num int not null auto_increment,
    id char(20) not null,
    pw char(20) not null,
    name char(15) not null,
    phone char(20) not null,
    email char(80),
    postnum char(5),
    address char(100),
    membership char(1),
    email_marketing char(1),
    sms_marketing char(1),
    kakao_marketing char(1),
    primary key(num)
)