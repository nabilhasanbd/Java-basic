public class Pelindrome {
    public static void main(String[] args) {
        System.out.println(checkPelindrome.isPelindrome(111));
    }

    public static class checkPelindrome {
        public static boolean isPelindrome(int number) {
            int temp, lastDigit, rev = 0;
            temp = number;
            if (number > 0) {
                while (temp > 0) {
                    lastDigit = temp % 10;
                    rev = lastDigit + (rev * 10);
                    temp = temp / 10;
                }
                return number == rev;
            } else
                while (temp < 0) {
                    lastDigit = temp % 10;
                    rev = lastDigit + (rev * 10);
                    temp = temp / 10;
                }
            return number == rev;
        }
    }
}
