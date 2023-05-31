// 달력 구현
function setCalender() {
    // 20XX년 X월 ver
    calenderMonth.innerHTML = `${nowYear}년 ${nowMonth+1}월`;
    
    firstDate = new Date (nowYear, nowMonth, 1); // 현재 연도, 현재 달, 1일
    firstDay = firstDate.getDay(); // 시작 요일
    dateCount = 1; // 날짜 카운트
    calenderMain.innerHTML = ""; // 달력 초기화

    /* 달력 row 제작 */
    for(let row = 0; row < 7; row++) {
        calenderMain.innerHTML += `<div class="row"></div>`;
    }
    
    calenderRow = document.querySelectorAll(".calender_main .row"); // 달력 row

    // 요일
    for(let column = 0; column < 7; column++) {
        calenderRow[0].innerHTML += `<div class="day">${day[column]}</div>`;
    }
    document.querySelectorAll(".row .day")[0].classList.add("sun"); // 일요일
    document.querySelectorAll(".row .day")[6].classList.add("sat"); // 토요일

    // 날짜
    for(let row = 1; row < 7; row++) {
        for(let column = 0; column < 7; column++) {
            if (dateCount == 1 && column != firstDay || dateCount > lastDate[nowMonth]) {
                if(nowYear % 4 == 0 && nowMonth == 1 && dateCount == 29) { // 윤달
                    calenderRow[row].innerHTML += `<div class="date">${dateCount++}</div>`; // 날짜 출력
                }
                else calenderRow[row].innerHTML += `<div>&nbsp;</div>`; // 날짜 제외 공백 출력
            }
            else {
                calenderRow[row].innerHTML += `<div class="date">${dateCount++}</div>`; // 날짜 출력
            }
        }
    }

    // 오늘
    if(nowYear == now.getFullYear() && nowMonth == now.getMonth()) { // 현재 달력에서 보여주는 연도와 달이 현재 연도와 달이 일치
        document.querySelectorAll(".row .date")[now.getDate()-1].classList.add("today"); // 현재 날짜를 이용해 클래스 추가
    }

    // 날짜 요일 확인
    for(let date = 0; date < lastDate[nowMonth]; date++) {
        let dateDay = new Date(nowYear, nowMonth, date+1); // 날짜 해당 요일 저장
        if(dateDay.getDay() == 0) document.querySelectorAll(".row .date")[date].classList.add("sun"); // 일요일
        else if (dateDay.getDay() == 6) document.querySelectorAll(".row .date")[date].classList.add("sat"); // 토요일
        else if (dateDay.getDay() == 1 && Math.ceil(date / 7) === 2) document.querySelectorAll(".row .date")[date].classList.add("mon") //셋째 월요일
    }

    // 날짜 클릭 이벤트
    for(let i = 0; i < lastDate[nowMonth]; i++) {
        let calenderDate = document.querySelectorAll(".row .date")[i];
        calenderDate.addEventListener("hover", () => {
            setContent(calenderDate.innerText); // 날짜 클릭 시 보여질 화면 구현 함수 호출
            
        });
    }
}

// 이전달 구현
function preMonth() {
    nowMonth--; // 현재 달 감소
    if(nowMonth < 0) { // 1월 넘어갈 시
        nowYear--; // 현재 연도 감소
        nowMonth = 11; // 현재 달 12월 설정
    }
    setCalender(); // 달력 구현 함수 호출
}

// 다음달 구현
function nextMonth() {
    nowMonth++; // 현재 달 증가
    if(nowMonth > 11) { // 12월 넘어갈 시
        nowYear++; // 현재 연도 증가
        nowMonth = 0; // 현재 달 1월 설정
    }
    setCalender(); // 달력 구현 함수 호출
}

// 해당 날짜 문구
function setContent(selectDate) {
    // 문구 표시
    let calenderDate = document.querySelectorAll(".row .date");
    for(let i = 0; i < lastDate[nowMonth]; i++) {
        calenderDate[i].classList.remove("select_date");
    }
    if(selectDate != 0) calenderDate[selectDate-1].classList.add("select_date"); // 초기 화면 이후
    else selectDate = now.getDate(); // 초기 화면일 때

    // 내용
    if (nowYear == now.getFullYear() && nowMonth == now.getMonth()
     && selectDate == now.getDate()) {
            calenderContent.innerHTML = `<p>오늘은 <b>${nowYear}년 
            ${nowMonth + 1}월 ${selectDate}일</b></p>
            <p><b>10:30</b>부터 <b>20:00</b>까지 정상 영업합니다.</p>`
        } 
    else (dateDay.getDay() == 1 && Math.ceil(date / 7) === 2)(
        calenderContent.innerHTML = `<p>오늘은 ${nowYear}년 ${nowMonth + 1}월 
        ${selectDate}일</p> <p><b>휴점일</b>입니다.</p>`
        )
}



let now = new Date(); // 현재 시간
let nowYear = now.getFullYear(); // 현재 연도
let nowMonth = now.getMonth(); // 현재 달
let firstDate = new Date (nowYear, nowMonth, 1); // 현재 연도, 현재 달, 1일
let firstDay = firstDate.getDay(); // 시작 요일
let lastDate = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 달의 마지막 날짜
let day = ["일", "월", "화", "수", "목", "금", "토"]; // 요일 한글
// let day = ["SUN", "MON", "THU", "WED", "THU", "FRI", "SAT"]; // 요일 영어
let dateCount = 1; // 날짜 카운트

let calenderContent = document.querySelector(".calender_wrap .calender_content"); // 날짜 클릭 시 보여질 화면
let calenderMonth = document.querySelector(".calender_wrap .calender_month"); // 달력 달 표시
let calenderMain = document.querySelector(".calender_wrap .calender_main"); // 달력
let calenderRow = document.querySelectorAll(".calender_main .row"); // 달력 row

// 초기 화면 세팅
setCalender(); // 달력 구현 함수 호출
setContent(0); // 날짜 클릭 시 보여질 화면 구현 함수 호출

// 이전달 클릭 이벤트
document.querySelector(".calender_wrap .pre").addEventListener("click", () => {
    preMonth(); // 이전달 구현 함수 호출
});

// 다음달 클릭 이벤트
document.querySelector(".calender_wrap .next").addEventListener("click", () => {
    nextMonth(); // 다음달 구현 함수 호출
});