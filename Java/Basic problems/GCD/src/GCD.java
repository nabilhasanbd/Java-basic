public class GCD {
    public static int getGCD(int number1, int number2)
    {
        if(number1 < 0 || number2 < 0) return -1;

        int getDivisor = ((number1 + number2) -Math.abs(number1-number2)) / 2;

        int gcd =1;
        for(int i=1; i<getDivisor ; i++){
            if((number1 % i == 0) && (number2 % i ==0))
                gcd =i;
        }
        return gcd ;
    }
}
