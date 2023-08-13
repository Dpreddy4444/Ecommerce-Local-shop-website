package com.dp.market;

import java.util.Calendar;

public class CountdownTimer {
    public static long getFutureTime(int hours) {
        Calendar futureTime = Calendar.getInstance();
        futureTime.add(Calendar.HOUR_OF_DAY, hours);
        return futureTime.getTimeInMillis();
    }
}