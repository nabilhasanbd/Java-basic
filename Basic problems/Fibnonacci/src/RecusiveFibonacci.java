public class RecusiveFibonacci {
    public static void recursiveFibonacci(int n) {
        if (n <= 1)
            System.out.println("Invalid");
        System.out.println(recursiveFibonacci(n - 1) +" "+ recursiveFibonacci(n - 2));
    }
}

