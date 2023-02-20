public class Fibonacci {
    public static void getFibonacci(int n)
    {
        if(n < 1){
            System.out.println("No possible to generate series");
        }
        int first = 0, second =1, next;
        for(int i = first ; i<n ; i++ ){
            next = first+second;
            System.out.print(" "+ next +" ");
            first = second;
            second = next;
        }

    }
}
