public class PerfectNumber {
   public static boolean isPerfect(int number){
       if(number < 1){
           return false;
       }
       int sum =0;
       if(number > 1){
           for (int i=1; i<number; i++){
               if(number % i == 0 ){
                   sum = sum + i;
               }
           }
       }
       return sum == number;
   }
}


