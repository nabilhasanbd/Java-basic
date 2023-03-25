import java.util.Scanner;

public class Solution {
    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        System.out.println("================================");
        String output = null;
        for (int i = 0; i < 3; i++) {
            String s = sc.next();
            int num = sc.nextInt();

            int stringCount = 15 - s.length();
            int intCount = Integer.toString(num).length();

            StringBuilder string = new StringBuilder();
            string.append(s);

            for (int j = 0; j < stringCount; j++) {
                string.append(" ");
            }

            if (intCount == 1) {
                string.append("00");
                string.append(num);
            } else if (intCount == 2) {
                string.append("0");
                string.append(num);
            } else {
                string.append(num);
            }

            System.out.println(string);
        }


        System.out.println("================================");
    }
}
