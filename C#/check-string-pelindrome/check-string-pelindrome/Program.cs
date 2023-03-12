using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.CompilerServices;
using System.Text;
using System.Threading.Tasks;

namespace check_string_pelindrome
{
    internal class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Enter string");
            string message = Console.ReadLine();
            string revs= "";
            for(int i = message.Length - 1; i >= 0; i--)
            {
                revs = revs + message[i].ToString();

            }
            if (message == revs)
            {
                Console.WriteLine(message + " is a pelindrome");
            } else 
                Console.WriteLine(message + " not a pelindrome");

        }
    }
}
