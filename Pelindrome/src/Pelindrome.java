public class Pelindrome {
    public static void main(String[] args) {
        System.out.println(PerfectNumber.isPerfect(18));
    }

    public class checkPelindrome {
        public static boolean isPelindrome(int number) {
            int temp, lastDigit, rev = 0;
            temp = number;
            if (number > 0) {
                while (temp > 0) {
                    lastDigit = temp % 10;
                    rev = lastDigit + (rev * 10);
                    temp = temp / 10;
                }
                return number == rev ? true : false;
            } else
                while (temp < 0) {
                    lastDigit = temp % 10;
                    rev = lastDigit + (rev * 10);
                    temp = temp / 10;
                }
            return number == rev ? true : false;
        }
    }

}
